<?php

namespace App\Models\General;

use App\Models\BaseModel;

/**
 * App\Models\General\InboundEmail
 *
 * @property int                             $id
 * @property string                          $body_plain
 * @property string                          $date
 * @property string                          $domain
 * @property string                          $from
 * @property string                          $from_full
 * @property string                          $message_headers
 * @property string                          $message_id
 * @property string                          $message_url
 * @property string                          $recipient
 * @property string                          $sender
 * @property string                          $stripped_html
 * @property string|null                     $stripped_signature
 * @property string                          $stripped_text
 * @property string                          $subject
 * @property string                          $response_timestamp
 * @property string                          $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereBodyPlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereFromFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereMessageHeaders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereMessageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereResponseTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereStrippedHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereStrippedSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereStrippedText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\General\InboundEmail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InboundEmail extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'body_plain',
        'date',
        'domain',
        'from',
        'from_full',
        'message_headers',
        'message_id',
        'message_url',
        'recipient',
        'sender',
        'stripped_html',
        'stripped_signature',
        'stripped_text',
        'subject',
        'response_timestamp',
        'token',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'inbound_emails_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return $this->toArray();
    }
}
