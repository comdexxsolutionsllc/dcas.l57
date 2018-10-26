<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailgunWidgetsController extends Controller
{
    public function store()
    {
        app('log')->debug(request()->all());

        return response()->json(['status' => 'ok']);
    }
}

/**

[2019-01-26 20:50:29] local.DEBUG: array (
  'timestamp' => '1548557429',
  'token' => '8a18aced695aef841869ca2a01600198f3367b6570cd4969a2',
  'signature' => '7e66950ff1bb73a27c87acd86834d0e4e169dbacc4df775d8021c0a8ff4106fa',
  'domain' => 'dcas.live',
  'From' => 'Sarah A Renner <sarahzabbott@icloud.com>',
  'X-Envelope-From' => '<sarahzabbott@icloud.com>',
  'X-Proofpoint-Virus-Version' => 'vendor=fsecure engine=2.50.10434:,, definitions=2019-01-27_01:,, signatures=0',
  'To' => 'support@dcas.live',
  'Dkim-Signature' => 'v=1; a=rsa-sha256; c=relaxed/relaxed; d=icloud.com;	s=04042017; t=1548557426;	bh=zQLSE5iEaG4DAqwLA4dB5aaGg68zWV6eSnPYZyh7Kgs=;	h=From:Content-Type:Mime-Version:Date:Subject:Message-Id:To;	b=QaOt3Mz7+TK7SR01GiH3EkFJPavuI4awddpAKkPUSTGLsxEYKB13pOZqHsDzgDRV/	 SJnsyxbhsNyt1AxlGK83GKk1YcvOp4OLfZMExWPLszd9XegdWLhz747cmdfSpCRYRn	 fYB5hQYiCqPhF2OPoTuTpeZIKROepkGVOcvAubvgcMMRVR5/PszJs46YHDEQZIlrVo	 1oVTKwhjlB/J4+jfuylG9f7gbihExVjvNDNQXHkyn+ql6CGGEJS8Hup4iwzvUhpHfG	 Hg1G5xB4sRkFIc0Ibbts8/+FOJvjFRcy5K28yzaUwkOW/Jgk+Q35+++PcToL81n3Ez	 MGHlZssNEeoZQ==',
  'subject' => 'Nagghhhhhhg',
  'from' => 'Sarah A Renner <sarahzabbott@icloud.com>',
  'Content-Transfer-Encoding' => '7bit',
  'Date' => 'Sat, 26 Jan 2019 20:50:25 -0600',
  'Message-Id' => '<17B865AF-69F2-4F86-A519-7F9376DD7EB7@icloud.com>',
  'Mime-Version' => '1.0 (1.0)',
  'Received' => 'from [10.0.0.121] (c-73-120-206-193.hsd1.il.comcast.net [73.120.206.193])	by ms11p00im-hyfv17291101.me.com (Postfix) with ESMTPSA id 5EED36C00AF	for <support@dcas.live>; Sun, 27 Jan 2019 02:50:26 +0000 (UTC)',
  'message-url' => 'https://se.api.mailgun.net/v3/domains/dcas.live/messages/eyJwIjpmYWxzZSwiayI6Ijg3Njg5OTI1LTJhNmUtNDI3MC1hMDQyLTBiNDE3NjhhOThlOSIsInMiOiIwNTdlODBmMzkwIiwiYyI6InRhbmtiIn0=',
  'message-headers' => '[["X-Mailgun-Incoming", "Yes"], ["X-Envelope-From", "<sarahzabbott@icloud.com>"], ["Received", "from ms11p00im-hyfv17291101.me.com (ms11p00im-hyfv17291101.me.com [17.58.38.40]) by mxa.mailgun.org with ESMTP id 5c4d1c75.7fa18aa437c8-smtp-in-n02; Sun, 27 Jan 2019 02:50:29 -0000 (UTC)"], ["Dkim-Signature", "v=1; a=rsa-sha256; c=relaxed/relaxed; d=icloud.com;\\ts=04042017; t=1548557426;\\tbh=zQLSE5iEaG4DAqwLA4dB5aaGg68zWV6eSnPYZyh7Kgs=;\\th=From:Content-Type:Mime-Version:Date:Subject:Message-Id:To;\\tb=QaOt3Mz7+TK7SR01GiH3EkFJPavuI4awddpAKkPUSTGLsxEYKB13pOZqHsDzgDRV/\\t SJnsyxbhsNyt1AxlGK83GKk1YcvOp4OLfZMExWPLszd9XegdWLhz747cmdfSpCRYRn\\t fYB5hQYiCqPhF2OPoTuTpeZIKROepkGVOcvAubvgcMMRVR5/PszJs46YHDEQZIlrVo\\t 1oVTKwhjlB/J4+jfuylG9f7gbihExVjvNDNQXHkyn+ql6CGGEJS8Hup4iwzvUhpHfG\\t Hg1G5xB4sRkFIc0Ibbts8/+FOJvjFRcy5K28yzaUwkOW/Jgk+Q35+++PcToL81n3Ez\\t MGHlZssNEeoZQ=="], ["Received", "from [10.0.0.121] (c-73-120-206-193.hsd1.il.comcast.net [73.120.206.193])\\tby ms11p00im-hyfv17291101.me.com (Postfix) with ESMTPSA id 5EED36C00AF\\tfor <support@dcas.live>; Sun, 27 Jan 2019 02:50:26 +0000 (UTC)"], ["From", "Sarah A Renner <sarahzabbott@icloud.com>"], ["Content-Type", "text/plain; charset=\\"us-ascii\\""], ["Content-Transfer-Encoding", "7bit"], ["Mime-Version", "1.0 (1.0)"], ["Date", "Sat, 26 Jan 2019 20:50:25 -0600"], ["Subject", "Nagghhhhhhg"], ["Message-Id", "<17B865AF-69F2-4F86-A519-7F9376DD7EB7@icloud.com>"], ["To", "support@dcas.live"], ["X-Mailer", "iPhone Mail (16D5039a)"], ["X-Proofpoint-Virus-Version", "vendor=fsecure engine=2.50.10434:,, definitions=2019-01-27_01:,, signatures=0"], ["X-Proofpoint-Spam-Details", "rule=notspam policy=default score=9 suspectscore=1 malwarescore=0 phishscore=0 bulkscore=0 spamscore=9 clxscore=1015 mlxscore=9 mlxlogscore=103 adultscore=0 classifier=spam adjust=0 reason=mlx scancount=1 engine=8.0.1-1807170000 definitions=main-1901270020"]]',
  'X-Proofpoint-Spam-Details' => 'rule=notspam policy=default score=9 suspectscore=1 malwarescore=0 phishscore=0 bulkscore=0 spamscore=9 clxscore=1015 mlxscore=9 mlxlogscore=103 adultscore=0 classifier=spam adjust=0 reason=mlx scancount=1 engine=8.0.1-1807170000 definitions=main-1901270020',
  'recipient' => 'support@dcas.live',
  'sender' => 'sarahzabbott@icloud.com',
  'X-Mailgun-Incoming' => 'Yes',
  'X-Mailer' => 'iPhone Mail (16D5039a)',
  'Content-Type' => 'text/plain; charset="us-ascii"',
  'Subject' => 'Nagghhhhhhg',
  'body-plain' => 'Regards,

Sarah Renner
main     sarahalexandrarenner@icloud.com
alt         sarah@sarahrenner.work
mobile 510.990.2347',
  'stripped-html' => '<p>Regards,
</p>',
  'stripped-text' => 'Regards,',
  'stripped-signature' => 'Sarah Renner
main     sarahalexandrarenner@icloud.com
alt         sarah@sarahrenner.work
mobile 510.990.2347',
)  


*
**/



/**
public function store(Request $request)
{
    app('log')->debug(request()->all());

    $files = collect(json_decode($request->input('attachments'), true))
        ->filter(function ($file) {
            return $file['content-type'] == 'text/csv';
        });

    if ($files->count() === 0) {
        return response()->json([
            'status' => 'error',
            'message' => 'Missing expected CSV attachment'
        ], 406);
    }

    dispatch(new ProcessWidgetFiles($files));

    return response()->json(['status' => 'ok'], 200);
}
**/

/**
use GuzzleHttp\Client;

$response = (new Client())->get($file['url'], [
    'auth' => ['api', config('services.mailgun.secret')],
]);
**/

