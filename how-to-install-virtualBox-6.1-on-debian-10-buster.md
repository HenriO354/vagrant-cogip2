[How To Install VirtualBox 6.1 on Debian 10 (Buster)](https://tecadmin.net/install-virtualbox-on-debian-10-buster/)
Virtualization: VT-x must be enabled

Error messages: 

"The following SSH command responded with a non-zero exit status"
-Solution:

"A Virtualbox Guest Additions installation was found but no tools to rebuild or start them.
Got different reports about installed GuestAdditions version:
Virtualbox on your host claims:   5.2.8
VBoxService inside the vm claims: 5.2.42"

-Solution:[site](https://subscription.packtpub.com/book/virtualization-and-cloud/9781786464910/1/ch01lvl1sec12/enabling-virtualbox-guest-additions-in-vagrant)

"default: bash: /tmp/vagrant-shell: /usr/bin/bash: bad interpreter: No such file or directory
The SSH command responded with a non-zero exit status. Vagrant
assumes that this means the command failed. The output for this command
should be in the log above. Please read the output to determine what
went wrong."

-Solution:

"Err:6 http://security.ubuntu.com/ubuntu bionic-updates/main amd64 linux-libc-dev amd64 4.15.0-177.186 <b>404</b>  Not Found [IP: 91.189.91.38 80]"
-Solution:

"default: dpkg-preconfigure: unable to re-open stdin: No such file or directory"

-Solution: [site](https://fixyacloud.wordpress.com/2020/01/26/dpkg-reconfigure-unable-to-re-open-stdin-no-file-or-directory/)

"default: [Warning] Using a password on the command line interface can be insecure.
    default: mysql:"
-Solution:

"default: dpkg-preconfigure: unable to re-open stdin: No such file or directory"
-Solution:

"default: cp: cannot stat '/var/wwww/html/000-default.conf': No such file or directory"
-Solution:





