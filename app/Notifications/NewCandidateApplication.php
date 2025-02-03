<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Candidate;

class NewCandidateApplication extends Notification implements ShouldQueue // Add ShouldQueue for queueing
{
    use Queueable;

    public $candidate;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Use both email and database channels
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Candidate Application Received')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('A new candidate has applied for a job:')
                    ->line('Candidate Name: ' . $this->candidate->full_name)
                    ->line('Job Title: ' . $this->candidate->job->title)
                    ->action('View Application', route('candidates.index')) // Update with your route
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'candidate_id' => $this->candidate->id,
            'job_title' => $this->candidate->job->title,
            'message' => 'New candidate application received: ' . $this->candidate->full_name,
        ];
    }
}
