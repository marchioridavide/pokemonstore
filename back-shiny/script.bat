@for /f "delims=" %%i in ('dir /a-d/b') do @for /f "tokens=* delims=0" %%j in ("%%i") do @ren "%%i" "%%j"