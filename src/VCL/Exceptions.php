<?php
// ----------------------------------------------------------------------------
// File   : TScreen.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace will look like the Delphi VCL-Framework under Windows XP.
// ----------------------------------------------------------------------------
namespace VCL {
    class EDivisionByZero extends \Exception {
        public function __construct(
            $message,
            $code = 0,
            Throwable $prev = null) {
            parent::__construct($message,$code,$prev);
        }
    }
}   // namespace: VCL
?>