<?php
/**
 * @link http://php.net/manual/en/mongodb-driver-manager.construct.php
 * @link https://docs.mongodb.com/manual/reference/connection-string
 */
return array(
    'driver' => array(
        // Master Connection Client
        'master' => array(
            ## mongodb://[username:password@]host1[:port1][,host2[:port2],...[,hostN[:portN]]][/[database][?options]]
            ## anything that is a special URL character needs to be URL encoded.
            ## This is particularly something to take into account for the password,
            #- as that is likely to have characters such as % in it.
            'host' => 'mongodb://localhost:27017',
            ## Specifying options via the options argument will overwrite any options
            #- with the same name in the uri argument.
            'options_uri' => array(
            ),
            'options' => array(
            ),
        ),
    ),
);
