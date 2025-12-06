<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command("recruitment:process-sheduled")->everyMinute();
Schedule::command("interview:process-sheduled")->everyMinute();
