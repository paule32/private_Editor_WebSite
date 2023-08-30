<?php
// ----------------------------------------------------------------------------
// File   : TApplication.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace will look like the Delphi VCL-Framework under Windows XP.
// ----------------------------------------------------------------------------
namespace VCL {
    class TApplication extends TObject
    {
        // ----------------------------------------------
        // @brief This is the constructor of TScreen
        // ----------------------------------------------
        public function __construct($prev)
        {
            $parent = $prev;
            //(parent::__construct($prev);
            
            // set default properties ...
            $this->properties += [
                'Parent'    => $parent,
                'ClassName' => array(
                    'value'    => new TString($this,'TApplication'),
                    'type'     => 'stringObject',
                    'code'     => array()),
                'Title'     => array(
                    'value'    => new TString($this,'Application 1'),
                    'type'     => 'stringObject',
                    'code'     => '')
            ];
        }
    }
}   // namespace: VCL
?>