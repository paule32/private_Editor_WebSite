<?php
// ----------------------------------------------------------------------------
// File   : TComponent.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace will look like the Delphi VCL-Framework under Windows XP.
// ----------------------------------------------------------------------------
namespace VCL {
    class TComponent extends TObject {
        const ClassName = "TComponent";
        private $Components = [];
        public function Count(): int {
            return count($Components);
        }
        public function ToString(): string {
            return parent::ToString() . " -> " . TComponent::ClassName;
        }
        function __construct() {
            echo "aaaa";
        }
    }
}   // namespace
?>