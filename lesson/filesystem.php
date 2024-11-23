<?php
//// page 149
// r for read
// w for write
// a for append
// r+ for read and write
// w+ for read and write (delete all content)
// a+ for read and append

$fh = fopen ("testfile.txt", "w+") or die( "Failed to create file");

// $text = <<<_END  //// for write multiple line
//     Line 1
//     Line 2
//     Line 3 ...

// _END; /// must be start of new line


$text = <<<_END
    append
    Line 1..........
    Line 2
    Line 3
_END;

fwrite($fh, $text) or die ("Could not write"); // write to file
fclose ($fh);
echo ("sucessfully");


////////////////////////////////////////////////////////////
copy ("testfile.txt", "testfile2.txt");


/// upload file as a homework
/// ask anyone for tver ey ?


