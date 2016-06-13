<?php

$docRoot = \Scoop\Config::get_option( 'server_document_root' );
if ( $docRoot ) {
    \Scoop\Config::set_option( 'server_document_root', __DIR__ );
}
