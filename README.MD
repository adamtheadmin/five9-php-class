# PHP five9 REPORTS Class

Five9 PHP API Class for reporting
By Adam Fowler


This is a class for handling reports and other API Methods through a clean PHP Class. The reason this package was created is to easily handle the long-polling requirements set by the five9 API. This handles all the dirty work in the background, so you don't have to.

If you have any good contributions to make to this code please do so.

Example Code:

    <?php
    include(dirname(__FILE__) . "/five9.class.php");
    $five9 = new five9([
        "username" => "***",
        "password" => "***"
    ]);
    //example reporting
    $report = $five9->runReport("FolderName", "ReportName", [
        'time' => [
            'start' => date('c', strtotime($date . " 12:00 AM")),
            'end' => date('c', strtotime($date . " 11:59 PM"))
        ]
    ]);

### Software Licence
The MIT License (MIT)

Copyright (c) 2015 Adam Fowler

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
