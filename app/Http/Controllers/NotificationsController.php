<?php

namespace ActivismeBE\Http\Controllers;

use ActivismeBE\Repositories\NotificationRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class NotificationsController
 *
 * If tour building a project don't edit these file. Because this file will be overwritten.
 * When we are updated our project skeleton. And if you found an issue in this controller
 * User the following links.
 *
 * @url https://github.com/CPSB/Skeleton-project
 * @url https://github.com/CPSB/Skeleton-project/issues
 */
class NotificationsController extends Controller
{
    /**
     * @var NotificationRepository
     */
    private $notifications;

    /**
     * NotificationsController constructor.
     *
     * @param  NotificationRepository $notifications
     * @return void
     */
    public function __construct(NotificationRepository $notifications)
    {
        $this->middleware('auth');
        $this->middleware('banned');
        $this->middleware('lang');

        $this->notifications = $notifications;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Set one notification as read.
     *
     * @param  string $notificationId The id in the database for the notification.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markOne($notificationId)
    {
        try {
            $notification = $this->notifications->findNotification($notificationId);

            if ($notification->update(['read_at' => Carbon::now()])) {
                flash('The notification has been read.');
            }

            return back(302);
        } catch (ModelNotFoundException $modelNotFoundException) {
            flash('We copuld not mark the notification with an read status')->error();
            return back(302);
        }
    }

    /**
     * Mark one notification as read.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAll()
    {
        if (auth()->user()->unreadNotifications->markAsRead()) {
            flash('All notifications as been read.')->success();
        }

        return back(302);
    }
}
