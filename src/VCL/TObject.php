<?php
// ----------------------------------------------------------------------------
// File   : TObject.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace will look like the Delphi VCL-Framework under Windows XP.
// ----------------------------------------------------------------------------
namespace VCL {
    class TObject
    {
        // propwerties for TScreen
        protected $properties = array();
        protected $parent     = null;

        // ----------------------------------------------
        // @brief This is the constructor of TObject
        // ----------------------------------------------
        public function __construct($prev)
        {
            $parent = $prev;

            // set default properties ...
            $this->properties += [
                'ClassName' => array(
                    'value'    => 'TObject',
                    'type'     => 'string',
                    'code'     => array())
            ];
        }
        public function __call($name, $arguments) {
            if ($name === 'toString') {
                if (count($arguments) == 0) {
                    return $this->properties['ClassName']['value'];
                }
            }
        }
    }
}   // namespace VCL

?>