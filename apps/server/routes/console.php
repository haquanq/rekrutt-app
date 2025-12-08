<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command("recruitment:update-scheduled")->everyMinute();
Schedule::command("interview:process-scheduled")->everyMinute();
