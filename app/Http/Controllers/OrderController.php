<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function showCompletedOrders(Request $request)
    {
        // Mendapatkan input tanggal dari request
        $start_date = $request->input('start_date') ?? null;
        $end_date = $request->input('end_date') ?? null;

        // Query untuk mendapatkan pesanan yang completed dan sesuai dengan rentang tanggal
        $query = Pesanan::where('status', 'completed')->with('user', 'orderItems.plant');

        if ($start_date) {
            $query->whereDate('created_at', '>=', $start_date);
        }

        if ($end_date) {
            $query->whereDate('created_at', '<=', $end_date);
        }

        $completedOrders = $query->get();

        // Menghitung total pendapatan
        $totalPendapatan = $completedOrders->sum(function ($order) {
            return $order->orderItems->sum('sub_harga');
        });

        return view('backend.order.riwayatPenjualan', compact('completedOrders', 'totalPendapatan'));
    }

    public function cetakOrders(Request $request)
    {
        // Mendapatkan input tanggal dari request
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        
        // Inisialisasi variabel tanggal yang diformat
        $formatted_start_date = $start_date ? Carbon::parse($start_date)->format('d-m-Y') : null;
        $formatted_end_date = $end_date ? Carbon::parse($end_date)->format('d-m-Y') : null;
        
        // Query untuk mendapatkan pesanan yang completed dan sesuai dengan rentang tanggal
        $query = Pesanan::where('status', 'completed')->with('user', 'orderItems.plant');
        
        if ($start_date) {
            $query->whereDate('created_at', '>=', $start_date);
        }
        
        if ($end_date) {
            $query->whereDate('created_at', '<=', $end_date);
        }
        
        $completedOrders = $query->get();
        
        // Menghitung total pendapatan
        $totalPendapatan = $completedOrders->sum(function ($order) {
            return $order->orderItems->sum('sub_harga');
        });
        
        // Return ke tampilan backend.order.cetaksemua
        return view('backend.order.cetaksemua', compact('completedOrders', 'totalPendapatan', 'formatted_start_date', 'formatted_end_date'));
    }

    public function cetaksatuOrders($id)
    {
        // Temukan pesanan berdasarkan ID
        $order = Pesanan::with('user', 'orderItems.plant')->findOrFail($id);

        // Menghitung total pendapatan untuk pesanan ini
        $totalPendapatan = $order->orderItems->sum('sub_harga');

        // Kembalikan view untuk mencetak satu pesanan
        return view('backend.order.cetaksatu', compact('order', 'totalPendapatan'));
    }


    public function konfirmationOrders()
    {
        $pendingOrders = Pesanan::where('status', 'pending')->with('user', 'orderItems.plant')->get();

        return view('backend.order.konfirmasiPesanan', compact('pendingOrders'));
    }

    public function confirmOrder($id)
    {
        $order = Pesanan::findOrFail($id);
        $order->status = 'completed';
        $order->save();

        return redirect()->back()->with('success', 'Pesanan Telah Siap!');
    }

    public function deleteOrder($id)
    {
        $order = Pesanan::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Pesanan Dihapus');
    }
}
