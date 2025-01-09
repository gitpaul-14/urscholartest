<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Message;

class MessageController extends Controller
{
    public function conversation()
    {
        return Inertia::render('Coordinator/Messaging/Messaging');
    }
    public function index()
    {
        return inertia('Coordinator/Messaging/Messaging', [
            'messages' => Message::with('user')->latest()->get(),
        ]);
    }
}
