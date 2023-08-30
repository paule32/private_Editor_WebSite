<?php
// ----------------------------------------------------------------------------
// File   : TButton.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace will look like the Delphi VCL-Framework under Windows XP.
// ----------------------------------------------------------------------------
namespace VCL {
    class TButton extends TComponent {
        const ClassName = "TButton";
        public function ToString(): string {
            return parent::ToString() . " -> " . TButton::ClassName;
        }
        function __construct() {
        }
    }
}   // namespace: VCL
?>