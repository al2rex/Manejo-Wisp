#sudo yum -y update;
wget http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm;
sudo rpm -Uvh epel-release-6*.rpm;
sudo yum repolist;
curl --silent --location https://rpm.nodesource.com/setup | sudo bash -
if ! rpm -qa | grep -qw nano; then
    sudo yum install -y nano;
fi
if ! rpm -qa | grep -qw openvpn; then
   sudo yum install -y openvpn;
fi
sudo yum install -y gcc gcc-c++ patch readline readline-devel curl zlib zlib-devel libyaml-devel libffi-devel openssl-devel make bzip2 autoconf automake libtool bison iconv-devel;
if ! rpm -qa | grep -qw compass; then
    curl -sSL https://rvm.io/mpapis.asc | sudo gpg2 --import -
    curl -L https://get.rvm.io | bash -s stable --ruby;
    source /usr/local/rvm/scripts/rvm;
    rvm install 2.2.1;
    rvm use 2.2.1;
    rvm rubygems latest;
    gem update --system;
    gem install bundler;
    gem install json_pure;
    gem install compass;
    gem install sass;
fi
#si aun no se instala puppet, registro el repo y lo instalo
if ! rpm -qa | grep -qw puppet; then
    sudo rpm --import http://yum.puppetlabs.com/RPM-GPG-KEY-puppetlabs;
    sudo rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-6
    sudo rpm -ivh http://yum.puppetlabs.com/el/6.5/products/x86_64/puppetlabs-release-6-7.noarch.rpm;
    sudo yum -y install puppet;
fi
#para evitar el warning de que no existe el archivo
sudo touch /etc/puppet/hiera.yaml;
#istalo los modulos de los que depende mi site.pp
sudo puppet module install jfryman-nginx;
sudo puppet module install thias-php;
sudo puppet module install puppetlabs-stdlib;
sudo puppet module install puppetlabs-apt;
sudo puppet module install puppetlabs-concat;
sudo puppet module install stahnma-epel;
sudo puppet module install chocolatey-chocolatey;
sudo puppet module install treydock-gpg_key;
sudo puppet module install example42-yum;
sudo puppet module install puppetlabs-mysql;
sudo puppet module install puppetlabs-nodejs;