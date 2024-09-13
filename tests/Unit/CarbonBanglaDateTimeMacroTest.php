<?php

namespace BanglaDateTime\Laravel\Tests\Unit;

use BanglaDateTime\Laravel\Tests\TestCase;
use Illuminate\Support\Carbon;

class CarbonBanglaDateTimeMacroTest extends TestCase
{
    public function test_it_can_format_date_in_bangla()
    {
        $date = Carbon::parse('2023-04-13');
        $formattedDate = $date->formatBangla('l jS F Y');
        $this->assertEquals('বৃহস্পতিবার ১৩ই এপ্রিল ২০২৩', $formattedDate);
    }

    public function test_it_can_convert_to_bangla_calendar()
    {
        $date = Carbon::parse('2023-04-13');
        $banglaDate = $date->toBangla('l jS F Y');
        $this->assertEquals('বৃহস্পতিবার ৩০শে চৈত্র ১৪২৯', $banglaDate);
    }
}
