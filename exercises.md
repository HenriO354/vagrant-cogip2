# exercise one

Install Vagrant and Virtualbox on your laptop if they are not already installed.<br>
Installing the Guest Addition Plugin for Vagrant

- Open a console session.
Run the following Vagrant command

        vagrant plugin install vagrant-vbguest

Create a Vagrant machine with an Ubuntu 18.04 image
from the Vagrantfile used to create the virtual machine, [run-an-ansible-playbook](https://www.learnitguide.net/2018/01/ansible-playbook-tutorial-with-examples.html) that:
<br>

-   Updates the VM if at least one pkg has been updated reboot the VM
-   create a group wheel
-   create a user deploy in wheel group with /bin/bash as shell without password
permit sudo without password for group wheel
-   add your ssh public key for the user deploy
-   disable root access through ssh even with an ssh key
-   Test if it is working doing an ssh to the VM with your ssh key and user deploy. 
-   Make sure you could become root without password

## Prepare another ansible playbook that:
-   install docker on the VM
-   ensure docker will start at the next reboot

-   Run the point 5 playbook with the VM as host (Use user deploy with your ssh key for authentication)
-   Ensure docker is running on the VM and will start at the next reboot
<br><br>

<b>Exercise two</b>

Do the exercise one then:

-   Create your github account (or use another free repository hosting service) 
-   if you don't already have one
On your repository hosting service create a new repo called sighup-challange

-   In this repository create a welcomepage.html

##  Create a dockerfile that:

-   use ubuntu 18.04 image as base image
-   install nginx (or apache if you prefer)
-   clone your repository sighup-challenge that contains the html welcomepage.html
-   use this welcomepage.html as default welcome page for nginx
-   Create a new ansible playbook that (use the deploy user to apply the playbook) 
-   deploy the container with the dockerfile created in the previous point
-   Ensure from your laptop browser you are able to see the welcome page from your docker container in the Vagrant machine
