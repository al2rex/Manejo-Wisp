# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "puppetlabs/centos-6.6-32-nocm"
  config.vm.box_check_update = false
  config.vbguest.auto_update = false
  config.vbguest.auto_reboot = false
  config.ssh.pty = true;
  config.vm.network "private_network", ip: "192.168.56.21"
  config.vm.provider "virtualbox" do |vb|
        # Display the VirtualBox GUI when booting the machine
        vb.gui = false
        # Customize the amount of memory on the VM:
        vb.memory = "512"
        vb.cpus = 2
  end
  config.vm.synced_folder "./", "/www/www.wisp.local.com"
  config.vm.provision :shell do |shell|
    shell.path = "vagrant/setup.sh"
  end  
  config.vm.provision "puppet", run: "always" do |puppet|
    puppet.manifests_path = "puppet/manifests"
    puppet.manifest_file = "site.pp"
    puppet.options = "--verbose"
  end
  config.vm.provision :shell do |s|
    s.inline = "cat /vagrant/vagrant/database/*.sql | mysql -u root -f"
  end
  config.vm.provision :shell do |shell|
    shell.path = "vagrant/xdebug.sh"
  end 
end