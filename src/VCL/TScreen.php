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
    class TScreen extends TObject
    {
        // ----------------------------------------------
        // @brief This is the constructor of TScreen
        // ----------------------------------------------
        function __construct()
        {
            $parent = null;
            
            // set default properties ...
            $this->properties += [
                'parent'    => $parent,
                'ClassName' => array(
                    'value'    => new TString($this,'TScreen'),
                    'type'     => 'string',
                    'code'     => array()),
                'height'    => array(
                    'value'    => 728,
                    'type'     => 'int',
                    'code'     => array(
                        new TString($this,'"height = $(window).height();"'))),
                'width'     => array(
                    'value'    => 1024,
                    'type'     => 'int',
                    'code'     => array(
                        new TString($this,'"width = $(window).width();"')))
            ];
        }
        public function __get($name) {
            if ($name === 'width') {
                return (int) $this->properties['width'];
            }
            else if ($name === 'height') {
                return (int) $this->properties['height'];
            }
        }
        public function __call($name, $arguments) {
            if ($name === 'toString') {
                if (count($arguments) == 0) {
                    return $this->properties['ClassName']['value'];
                }
            }
        }
    }
}   // namespace: VCL
?>
