'temporary_file_upload' => [
    'disk' => 'public',
    'directory' => 'livewire-tmp',
    'rules' => ['file', 'max:5120'],
    'middleware' => null,
    'preview_mimes' => [
        'png', 'jpg', 'jpeg', 'webp',
    ],
],
