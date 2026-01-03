<?php

namespace App\Notifications;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class PengaduanBaru extends Notification implements ShouldQueue
{
    use Queueable;

    public Pengaduan $pengaduan;

    /**
     * Create a new notification instance.
     */
    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Notification channels
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Store notification in database
     */
    public function toDatabase($notifiable): array
    {
        return [
            'judul' => 'Pengaduan Baru',
            'pesan' => 'Pengaduan dari: ' . $this->pengaduan->nama,
            'kategori' => $this->pengaduan->kategori,
            'pengaduan_id' => $this->pengaduan->id,
            'url' => route('admin.pengaduan.index'),
            'dibuat_pada' => now(),
        ];
    }
}
