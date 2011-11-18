
Vagrant::Config.run do |config|
  config.vm.box = "sd-natty"

  config.vm.customize do |vm|
    vm.memory_size = 256
  end

  config.vm.forward_port "http", 80, 8080
  config.vm.forward_port("web", 9999, 9999)

  config.vm.provision :chef_solo do |chef|
    chef.cookbooks_path = "deploy/cookbooks"
    chef.add_recipe "radio::default"
  end

end
