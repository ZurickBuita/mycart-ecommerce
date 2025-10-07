<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotification(): Notification
    {
        $recipient = auth()->user();

        return Notification::make()
            ->title('Saved successfully')
            ->sendToDatabase($recipient);
    }
}
