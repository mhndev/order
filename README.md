## Order Service

```php

    $settings = array(
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


    $mongoDriver = new \mhndev\order\MongoDriverManager();
    $mongoDriver->addClient(new MongoDB\Client($settings['driver']['master']['host'] ), 'master' );
    $mongoClient = $mongoDriver->byClient('master');
    $db = $mongoClient->selectDatabase('order');
    
    

```