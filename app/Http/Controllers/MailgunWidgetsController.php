<?php

namespace App\Http\Controllers;

use App\General\EmailParser;
use App\Http\Requests\MailgunRequest;
use App\Models\General\InboundEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

// use Ixudra\Curl\Facades\Curl;

class MailgunWidgetsController extends Controller
{

    /**
     * @param \App\Http\Requests\MailgunRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MailgunRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = new Collection((new EmailParser)::parse($validated));

        preg_match('^(?:\<)(.*?)(?:\>)^', $data->get('From'), $from);

        $from = new Collection($from);

        $result = [
            'body_plain'         => $data->get('body-plain'),
            'date'               => $data->get('Date') ? date("Y-m-d H:i:s", strtotime($data->get('Date'))) : now(),
            'domain'             => $data->get('domain'),
            'from'               => $from->last() ?? null,
            'from_full'          => $data->get('From'),
            'message_headers'    => $data->get('message-headers'),
            'message_id'         => $data->get('Message-Id'),
            'message_url'        => $data->get('message-url'),
            'recipient'          => $data->get('recipient'),
            'sender'             => $data->get('sender'),
            'stripped_html'      => $data->get('stripped-html'),
            'stripped_signature' => $data->get('stripped-signature'),
            'stripped_text'      => $data->get('stripped-text'),
            'subject'            => $data->get('subject'),
            'response_timestamp' => $data->get('timestamp') ? date("Y-m-d H:i:s", strtotime($data->get('timestamp'))) : now(),
            'token'              => $data->get('token'),
        ];

        InboundEmail::create($result);

        return response()->json([
            'status' => 'ok',
            'data'   => $result,
        ]);
    }

    //    /**
    //     * @return mixed
    //     */
    //    public function test()
    //    {
    //        /**
    //         * public function store(Request $request)
    //         * {
    //         * app('log')->debug(request()->all());
    //         *
    //         * $files = collect(json_decode($request->input('attachments'), true))
    //         * ->filter(function ($file) {
    //         * return $file['content-type'] == 'text/csv';
    //         * });
    //         *
    //         * if ($files->count() === 0) {
    //         * return response()->json([
    //         * 'status' => 'error',
    //         * 'message' => 'Missing expected CSV attachment'
    //         * ], 406);
    //         * }
    //         *
    //         * dispatch(new ProcessWidgetFiles($files));
    //         *
    //         * return response()->json(['status' => 'ok'], 200);
    //         * }
    //         **/
    //
    //        /**
    //         * use GuzzleHttp\Client;
    //         *
    //         * $response = (new Client())->get($file['url'], [
    //         * 'auth' => ['api', config('services.mailgun.secret')],
    //         * ]);
    //         **/
    //
    //        $data = [
    //            'Content-Type'        => 'multipart/mixed; boundary="------------020601070403020003080006"',
    //            'Date'                => 'Fri, 26 Apr 2013 11:50:29 -0700',
    //            'From'                => 'Mom Big <mom@dcas.live>',
    //            'domain'              => 'dcas.live',
    //            'message-url'         => 'http://moo.com/message/id/4938372263849',
    //            'In-Reply-To'         => '<517AC78B.5060404@dcas.live>',
    //            'Message-Id'          => '<317ACC75.5010709@dcas.live>',
    //            'Mime-Version'        => '1.0',
    //            'Received'            => 'from [10.20.76.69] (Unknown [50.56.129.169]) by mxa.mailgun.org with ESMTP id 517acc75.4b341f0-worker2; Fri, 26 Apr 2013 18:50:29 -0000 (UTC)',
    //            'References'          => '<517AC78B.5060404@dcas.live>',
    //            'Sender'              => 'bob@dcas.live',
    //            'Subject'             => 'Re: Sample POST request',
    //            'To'                  => 'Alice <alice@dcas.live>',
    //            'User-Agent'          => 'Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20130308 Thunderbird/17.0.4',
    //            'X-Mailgun-Variables' => '{"my_var_1": "Mailgun Variable #1", "my-var-2": "awesome"}',
    //            'attachment-count'    => '2',
    //            'body-html'           => '<html>
    //  <head>
    //    <meta content="text/html; charset=ISO-8859-1"
    //      http-equiv="Content-Type">
    //  </head>
    //  <body text="#000000" bgcolor="#FFFFFF">
    //    <div class="moz-cite-prefix">
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">Hi Alice,</div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);"><br>
    //      </div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">This is Bob.<span class="Apple-converted-space">&nbsp;<img
    //            alt="" src="cid:part1.04060802.06030207@dcas.live"
    //            height="15" width="33"></span></div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);"><br>
    //        I also attached a file.<br>
    //        <br>
    //      </div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">Thanks,</div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">Bob</div>
    //      <br>
    //      On 04/26/2013 11:29 AM, Alice wrote:<br>
    //    </div>
    //    <blockquote cite="mid:517AC78B.5060404@dcas.live" type="cite">Hi
    //      Bob,
    //      <br>
    //      <br>
    //      This is Alice. How are you doing?
    //      <br>
    //      <br>
    //      Thanks,
    //      <br>
    //      Alice
    //      <br>
    //    </blockquote>
    //    <br>
    //  </body>
    //</html>',
    //            'body-plain'          => 'Hi Alice,
    //
    //This is Bob.
    //
    //I also attached a file.
    //
    //Thanks,
    //Bob
    //
    //On 04/26/2013 11:29 AM, Alice wrote:
    //> Hi Bob,
    //>
    //> This is Alice. How are you doing?
    //>
    //> Thanks,
    //> Alice',
    //            'content-id-map'      => '{"<part1.04060802.06030207@dcas.live>": "attachment-1"}',
    //            'from'                => 'Mom Big <mom@dcas.live>',
    //            'message-headers'     => '[["Received", "by luna.mailgun.net with SMTP mgrt 8788212249833; Fri, 26 Apr 2013 18:50:30 +0000"], ["Received", "from [10.20.76.69] (Unknown [50.56.129.169]) by mxa.mailgun.org with ESMTP id 517acc75.4b341f0-worker2; Fri, 26 Apr 2013 18:50:29 -0000 (UTC)"], ["Message-Id", "<517ACC75.5010709@dcas.live>"], ["Date", "Fri, 26 Apr 2013 11:50:29 -0700"], ["From", "Bob <bob@dcas.live>"], ["User-Agent", "Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20130308 Thunderbird/17.0.4"], ["Mime-Version", "1.0"], ["To", "Alice <alice@dcas.live>"], ["Subject", "Re: Sample POST request"], ["References", "<517AC78B.5060404@dcas.live>"], ["In-Reply-To", "<517AC78B.5060404@dcas.live>"], ["X-Mailgun-Variables", "{\\"my_var_1\\": \\"Mailgun Variable #1\\", \\"my-var-2\\": \\"awesome\\"}"], ["Content-Type", "multipart/mixed; boundary=\\"------------020601070403020003080006\\""], ["Sender", "bob@dcas.live"]]',
    //            'recipient'           => 'monica@dcas.live',
    //            'sender'              => 'chandler@dcas.live',
    //            'signature'           => '4facf3071b40cf981f2cec3a259d5d86250b1b96c1184c4b75bbf64a04253c1f',
    //            'stripped-html'       => '<html><head>
    //    <meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type">
    //  </head>
    //  <body bgcolor="#FFFFFF" text="#000000">
    //    <div class="moz-cite-prefix">
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">Hi Alice,</div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);"><br>
    //      </div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">This is Bob.<span class="Apple-converted-space">&#160;<img width="33" alt="" height="15" src="cid:part1.04060802.06030207@dcas.live"></span></div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);"><br>
    //        I also attached a file.<br>
    //        <br>
    //      </div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">Thanks,</div>
    //      <div style="color: rgb(34, 34, 34); font-family: arial,
    //        sans-serif; font-size: 12.666666984558105px; font-style: normal;
    //        font-variant: normal; font-weight: normal; letter-spacing:
    //        normal; line-height: normal; orphans: auto; text-align: start;
    //        text-indent: 0px; text-transform: none; white-space: normal;
    //        widows: auto; word-spacing: 0px; -webkit-text-size-adjust: auto;
    //        -webkit-text-stroke-width: 0px; background-color: rgb(255, 255,
    //        255);">Bob</div>
    //      <br>
    //      On 04/26/2013 11:29 AM, Alice wrote:<br>
    //    </div>
    //    <br>
    //
    //
    //</body></html>',
    //            'stripped-signature'  => 'Thanks,
    //Bob',
    //            'stripped-text'       => 'Hi Alice,
    //
    //This is Bob.
    //
    //I also attached a file.',
    //            'subject'             => 'Re: Sample POST request',
    //            'timestamp'           => '1549238461',
    //            'token'               => 'gf17eb156e25c126ad9bdabe80ca6c5803eeae03fe6d80d8a7',
    //            'attachment-1'        => [
    //                'test'         => false,
    //                'originalName' => 'crabby.gif',
    //                'mimeType'     => 'image/gif',
    //                'error'        => 0,
    //                'hashName'     => null,
    //            ],
    //            'attachment-2'        => [
    //                'test'         => false,
    //                'originalName' => 'attached_Ñ„Ð°Ð¹Ð».txt',
    //                'mimeType'     => 'text/plain',
    //                'error'        => 0,
    //                'hashName'     => null,
    //            ],
    //        ];
    //
    //        $allowed_tags = '<body><div><span><br><blockquote>';
    //
    //        $data['body-html'] = strip_tags($data['body-html'], $allowed_tags);
    //        $data['stripped-html'] = strip_tags($data['stripped-html'], $allowed_tags);
    //
    //        foreach ($data as $key => $d) {
    //            if ($key === 'body-html' || $key === 'stripped-html') {
    //                preg_replace('/(<[^>]+) style=".*?"/i', '$1', $d);
    //                preg_replace('/(<[^>]+) class=".*?"/i', '$1', $d);
    //            }
    //        }
    //
    //        $collection = collect($data)->toArray();
    //
    //        $response = Curl::to(route('mailgun.store'))->withData($collection)->asJson(true)->returnResponseObject()->post();
    //
    //        return $response->content;
    //    }
}
