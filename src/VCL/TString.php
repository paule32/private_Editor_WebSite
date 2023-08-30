<?php
// ----------------------------------------------------------------------------
// File   : TString.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace will look like the Delphi VCL-Framework under Windows XP.
// ----------------------------------------------------------------------------
namespace VCL {
    class TString extends TObject
    {
        public $parent = null;
        
        // ----------------------------------------------
        // @brief This is the constructor of TScreen
        // ----------------------------------------------
        public function __construct($prev,$text)
        {
            $parent = $prev;
            
            // set default properties ...
            $this->properties += [
                'ClassName' => array(
                    'value'    => $text,
                    'type'     => 'string',
                    'code'     => array())
            ];
        }
    }
}   // namespace: VCL
?>