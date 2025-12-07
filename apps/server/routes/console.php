<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command("recruitment:process-scheduled")->everyMinute();
Schedule::command("interview:process-scheduled")->everyMinute();
