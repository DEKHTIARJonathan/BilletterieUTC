set absPath=%cd%

set sub1=\Server\BadgingServer
set BadgingServer=%absPath%%sub1%

START cmd.exe /k "cd %BadgingServer% & Launch.bat"
