<?php
namespace Cachet\Test\Backend;

if (!extension_loaded('apc') || !extension_loaded('apcu')) {
    skip_test(__NAMESPACE__, "APCTest", "Neither apc nor apcu loaded");
}
elseif (ini_get('apc.enable_cli') != 1) {
    skip_test(__NAMESPACE__, "APCTest", "apc.enable_cli must be set");
}
else {
    /**
     * @group backend
     */
    class APCTest extends \Cachet\Test\IterableBackendTestCase
    {
        public function getBackend()
        {
            apc_clear_cache('user');
            $backend = new \Cachet\Backend\APC();
            return $backend;
        }
    }
}

