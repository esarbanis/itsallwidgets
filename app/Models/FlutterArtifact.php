<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Notifications\Notifiable;

class FlutterArtifact extends Model implements Feedable
{
    use Notifiable;

    protected $fillable = [
        'title',
        'slug',
        'url',
        'comment',
        'published_date',
        'type',
        'source_url',
        'repo_url',
        'is_approved',
        'is_visible',
        'meta_description',
        'meta_publisher',
        'meta_author',
        'meta_author_url',
        'meta_twitter_creator',
        'meta_twitter_site',
    ];

    protected $hidden = [
        'is_visible',
        'is_approved',
    ];

    protected $appends = [
    ];


    public function url()
    {
        return url((isIAW() ? 'flutterx/' : '') . $this->slug);
    }

    public function editUrl()
    {
        return $this->url() . '/edit';
    }

    public function link()
    {
        return link_to($this->url(), $this->event_name, ['target' => '_blank']);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeVisible($query)
    {
        $query->where('is_visible', '=', true);
    }

    public function scopeApproved($query)
    {
        $query->visible()->where('is_approved', '=', true);
    }

    public function scopeOwnedBy($query, $userId)
    {
        $query->where('user_id', '=', $userId);
    }

    public function toFeedItem()
    {
        /*
        return FeedItem::create()
            ->id($this->slug)
            ->title($this->title)
            ->summary($this->short_description)
            ->updated($this->updated_at)
            ->link('/flutter-app/' . $this->slug)
            ->author($this->title);
        */
    }
}
