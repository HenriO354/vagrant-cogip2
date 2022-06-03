# <center><b>Deploying the COGIP website using vagrant</center><br>
## Vagrant's Installation:
## Ansible Installation: [site](https://www.linuxtechi.com/how-to-install-ansible-on-ubuntu/)


Install Virtual Box

[How to install VB on debian 10 buster](how-to-install-virtualBox-6.1-on-debian-10-buster.md#sub-section)


- Start by updating the software packages to the latest version.

        sudo apt update

## Here we will use VirtualBox on which we use Vagrant to provision virtual machines.

- You can install VirtualBox using the following command.<br>

        sudo apt install virtualbox

## This will take sometime to complete the installation. Once the installation is completed you can proceed to install Vagrant.<br>
Install Vagrant

## To install Vagrant you need to download the latest version of .deb file from the vagrant downloads page.

Click the Debian tab and copy the download link and use curl or wget command to download the Vagrant package.

    wget https://releases.hashicorp.com/vagrant/2.2.14/vagrant_2.2.14_x86_64.deb

Once the file is downloaded you can install Vagrant.

    sudo apt install ./vagrant_2.2.14_x86_64.deb

<center><b>Now Vagrant will get installed and you can verify the installation using the below command</b>.</center><br>

    vagrant -v

You will receive an output similar to the one below.

    Output
    Vagrant 2.2.14

## Setup a New Virtual Machine
<br>
Now you can setup a new machine using your favorite OS. Here we will use Debian 10 image.

## Create a root directory for your project and setup a Vagrantfile.

        sudo mkdir ~/debian-box
        cd ~/debian-box

## You can use the init command followed by the box name to create the Vagrantfile for you.

## You can choose your own boxes from the official catalog.

        vagrant init generic/ubuntu1804

Now a new Vagrantfile will get created automatically and placed inside your current directory.

You can use the up command to provision a virtual machine using the configurations in the Vagrantfile.

    vagrant up

Once the creation is completed you will have a new virtual machine running on top of Virtual Box using Vagrant.
Additional commands

## SSH to the the virtual machine.

    vagrant ssh

## Stop virtual machine.

    vagrant halt

## Remove virtual machine.

    vagrant destroy

## Conclusion
<br>
Now you have learned how to install Vagrant and create a new virtual machine with Debian 10 image.

