if versioncmp($::puppetversion,'3.6.1') >= 0 {
    $allow_virtual_packages = hiera('allow_virtual_packages',false)
    Package {
      allow_virtual => $allow_virtual_packages,
    }
}

class pkgsextra{
    #por estructura paso estos paquetes a que se instalen por puppet y no por bash
    package { ['curl', 'git', 'ant', 'tar','java-1.7.0-openjdk-devel','java-1.7.0-openjdk','nano', 'gcc', 'gcc-c++','autoconf','automake'] :
        ensure  => present,
    }
}

class websrv{
    #esto asegura no tener problemas por un bug conocido con los archivos estaticos en virtualbox con linux y nginx
    class { 'nginx': sendfile => off }
    user { "nginx":
        ensure     => present,
        gid        => "nginx",
        groups     => ["vagrant","apache", "nginx"],
        # For the user to exist
            require => [Group['nginx'],Group['vagrant']]
    }
    group {"nginx":
        ensure     => present,
    }
    group {"vagrant":
        ensure     => present,
    }
    group {"apache":
        ensure     => present,
    }
}
class mysqlSrv {
    class { '::mysql::server':
      root_password           => 'password',
      remove_default_accounts => true
    }
    mysql::db { 'wisp':
      user     => 'wisp',
      password => mysql_password('password'),
      host     => 'localhost',
      grant    => ['ALL'],
    }
    mysql_grant { 'wisp@localhost/*.*':
      ensure     => 'present',
      options    => ['GRANT'],
      privileges => ['ALL'],
      table      => '*.*',
      user       => 'wisp@localhost',
    }
}

class appsrv {
    require yum::repo::remi
    require yum::repo::epel
    require yum::repo::remi_php55
    # For the user to exist
    require websrv
    package { 'libtidy':
        ensure  => present,
    }
    package { 'libtidy-devel':
        ensure  => present,
    }
    package { 'php-tidy':
        ensure  => present,
    }
    class { php::fpm::daemon:
        log_owner => 'nginx',
        log_group => 'nginx',
        log_dir_mode => '0775',
    }
    php::fpm::conf { 'www':
        listen  => '127.0.0.1:9001',
        user    => 'nginx',
    }
    php::module { [ 'pecl-apcu',
        'pear',
        'pdo',
        'mysqlnd',
        'pgsql',
        'pecl-mongo',
        'pecl-sqlite',
        'mbstring',
        'mcrypt',
        'xml',
        'pecl-memcached',
        'gd',
        'soap']:
        notify  => Service['php-fpm'],
    }
    php::ini { '/etc/php.ini':
        short_open_tag              => 'On',
        asp_tags                    => 'Off',
        date_timezone               =>'America/Mexico_City',
        error_reporting             => 'E_ALL',
        display_errors              => 'On',
        html_errors                 => 'On',
        notify  => Service['php-fpm'],
    }
    file { '/var/log/php-fpm/www-error.log':
        ensure => "file",
        owner  => "nginx",
        group  => "nginx",
        mode   => 666
    }
    file { '/var/log/php-fpm/error.log':
        ensure => "file",
        owner  => "nginx",
        group  => "nginx",
        mode   => 666,
    }
}
class xdebug {
    require appsrv
    package { ['php-devel'] :
        ensure  => present,
    }
}
class hostweb {
    require websrv
    require appsrv
    require mysqlSrv
    require xdebug

    nginx::resource::vhost { 'www.wisp.local.com':
        www_root => '/www/www.wisp.local.com',
        ssl => true,
        ssl_cert             => '/vagrant/puppet/certs/server.crt',
        ssl_key              => '/vagrant/puppet/certs/server.key',
        index_files           => [ 'index.php' ],
        use_default_location => false,
    }
    nginx::resource::location { "www.wisp.local.com":
        ensure          => present,
        ssl              => true,
        vhost           => 'www.wisp.local.com',
        www_root        => '/www/www.wisp.local.com',
        location        => '~ \.php$',
        index_files     => ['index.php'],
        proxy           => undef,
        fastcgi         => "127.0.0.1:9001",
        fastcgi_script  => undef,
        location_cfg_append => { 
            fastcgi_connect_timeout => '5h',
            fastcgi_read_timeout    => '5h',
            fastcgi_send_timeout    => '5h',
            fastcgi_param    => "APPLICATION_ENV 'development'"
        }
    }
    #nginx::resource::location { "try":
    #    ensure          => present,
    #    ssl              => true,
    #    vhost           => 'www.finder.local.com',
    #    location        => '/',
    #    www_root        => '/www/www.finder.local.com/public',
    #    location_cfg_append => {
    #        try_files => '$uri $uri/ /index.php$is_args$args'
    #    }
    #}
}
class stackmean {
    require appsrv
    class { 'nodejs': 
        repo_url_suffix => 'node_0.12'
    }
    package { 'inherits':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'express':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'express-generator':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'bower':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'mean-cli':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'jade':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'nodemon':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'gulp':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'gulp-util':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'gulp-concat':
      ensure   => 'present',
      provider => 'npm',
    }
    package { 'gulp-uglify':
      ensure   => 'present',
      provider => 'npm',
    }
}

include pkgsextra
include stackmean
include hostweb
