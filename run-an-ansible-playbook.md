# What is an Ansible playbook?
Overview:

- An Ansible® playbook is a blueprint of automation tasks—which are complex IT actions executed with limited or no human involvement. Ansible playbooks are executed on a set, group, or classification of hosts, which together make up an Ansible inventory.

- Ansible playbooks are essentially frameworks, which are prewritten code developers can use ad-hoc or as starting template. Ansible playbooks are regularly used to automate IT infrastructure (such as operating systems and Kubernetes platforms), networks, security systems, and developer personas (such as Git and Red Hat CodeReady Studio).

- Ansible playbooks help IT staff program applications, services, server nodes, or other devices without the manual overhead of creating everything from scratch. And Ansible playbooks—as well as the conditions, variables, and tasks within them—can be saved, shared, or reused indefinitely. 

# The Vagrantfile for our VM 
[site1](https://www.middlewareinventory.com/blog/vagrant-ansible-example/#The_Vagrantfile_for_our_VM)<br>
[site2](https://www.middlewareinventory.com/blog/vagrant-ansible-example/#Ansible_playbook_and_its_artifacts)<br>
- From the Vagrantfile, used to create the virtual machine, run an ansible playbook that:

    - update the VM
    - if at least one pkg has been updated reboot the VM
    - create a group wheel
    - create a user deploy in wheel group with /bin/bash as shell without password
    - permit sudo without password for group wheel
    - add your ssh public key for the user deploy
    - disable root access through ssh even with an ssh key
