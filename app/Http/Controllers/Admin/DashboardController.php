<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use App\Models\TraceabilityBatch;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin overview dashboard with metrics and recent activities.
     */
    public function index(): View
    {
        $productsCount = Product::count();
        $articlesCount = Article::count();
        $batchesCount = TraceabilityBatch::count();
        $ordersCount = Order::count();
        $pendingOrdersCount = Order::where('order_status', 'processing')->count();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();

        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_amount');

        $recentOrders = Order::with('items')
            ->latest()
            ->take(6)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'productsCount',
            'articlesCount',
            'batchesCount',
            'ordersCount',
            'pendingOrdersCount',
            'unreadMessagesCount',
            'totalRevenue',
            'recentOrders',
            'recentMessages'
        ));
    }
}
