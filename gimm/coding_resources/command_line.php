<!doctype html>
<html lang="en">
<?php
  $thisPage = "command_line";
  require_once('../../header.php');
  require_once('../../nav.php');
?>
<body>
	<div class="container-fluid">
		<br>
		<br>
		<br>
		<h1>Command line basic commands:</h1>
		<h2>Basic commands on a command line whther on a mac terminal or a mobaxterm like ssh client connected to a linux instance of an ec2 (or just a linux) are as follows:</h2>
		<h3>To move around the file system: type 'cd ..' to move up a directory, or 'cd directory_name_like_home' to move down into a directory'</h3>
		<h3>List the directories and files available at the location that your command line is at with 'ls' or 'ls -a' and see your current location in the file structure with 'pwd'</h3>
		<h3>To edit a file, type 'vim filename' or 'nano filename' Both vim and nano are file editors.  Once inside the file, to make changes in vim type 'i' to enter insert mode, make your changes, then type 'escape key' to exit insert mode, and ':wq' then enter to write your changes and quit.  Note you may need to use sudo vim or sudo nano to make changes to certain files.  With nano you can already edit once inside the file, type 'ctrl key + o' to write your changes, then 'ctrl key + x' to exit nano (the instructions for using nano appear at the bottom of the editor</h3>
		<h3>The sudo command gives you root admin privileges and allows you to make changes to file that require that access.  You often need sudo to edit files and perform updates or install things like 'sudo yum install httpd' for example, or 'sudo vim wp-config.php'</h3>
		<h3>Make sure you disconnect by typing 'logout' or closing your session in mobaxterm or a mac terminal after you are done modifying your ec2 instance, you can be charged for keeping a session open for long periods of time</h3>
		<br>
		<br>
	
	<h1>Connecting with a mac</h1>
		<h2> Open a terminal with the command key and space typing terminal </h2>
		<h2>In your terminal, using cd 'path/to/key' navivgate to your key.pem file, and use: 'chmod 400 my-key-pair.pem' to change permissions to private</h2>
		<h2>Once terminal is open type: ssh -i /Users/whatever/path/to/your/pemfile.pem ec2-user@public_dns_name_like_ec2-54-152-217-151.compute-1.amazonaws.com</h2>
		<h2>At this point you're connected just like a user connecting with an ssh client like mobaxterm or putty, and can follow the tutorials linked to on my home page from there to set up wordpress and bootstrap websites on aws ec2 except that when you transfer files you will use the scp command as follows from a terminal: </h2>
	<h2>SCP Syntax Examples</h2>

	<h3>What is Secure Copy?</h3>
	<h4>scp allows files to be copied to, from, or between different hosts.  It uses ssh for data transfer and provides the same authentication and same level of security as ssh</h4>.
	<h3>SCP Examples</h3>

	<h4>This is what you will use most of the time for transfering single files to a certian location via scp with the -i command line option:<h4/>
	<h4/>To copy the file "foobar.html" from the local host to a remote host while in the directory containing foobar.html</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp -i  /Path/To/Your/Password.pem_file foobar.html your_username@remotehost.edu:/some/remote/directory/like/var/www/html/website/
	</td></tr></table></ul>
	<h4/>For example, for me the command to copy index.html up to my home aws directory is:</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	scp -i /Users/danielhampikian/Documents/aws_key.pem /Users/Daniel/Documents/git/daniel_website/index.html ec2-user@ec2-12-123-12-123.compute-1.amazonaws.com:/var/www/html/
	</td></tr></table></ul>
	<h4>Copy the file "foobar.txt" from a remote host to the local host</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@remotehost.edu:foobar.txt /some/local/directory
	</td></tr></table></ul>
	<h4>Copy the file "foobar.txt" from the local host to a remote host</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp foobar.txt your_username@remotehost.edu:/some/remote/directory
	</td></tr></table></ul>
	<h4>Copy the directory "foo" from the local host to a remote host's directory "bar"</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp -r foo your_username@remotehost.edu:/some/remote/directory/bar
	</td></tr></table></ul>
	<h4>Copy the file "foobar.txt" from remote host "rh1.edu" to remote host "rh2.edu"</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@rh1.edu:/some/remote/directory/foobar.txt \<br>your_username@rh2.edu:/some/remote/directory/
	</td></tr></table></ul>
	<h4>Copying the files "foo.txt" and "bar.txt" from the local host to your home directory on the remote host</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp foo.txt bar.txt your_username@remotehost.edu:~
	</td></tr></table></ul>
	<h4>Copy the file "foobar.txt" from the local host to a remote host using port 2264</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp -P 2264 foobar.txt your_username@remotehost.edu:/some/remote/directory
	</td></tr></table></ul>
	<h4>Copy multiple files from the remote host to your current directory on the local host</h4>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@remotehost.edu:/some/remote/directory/\{a,b,c\} .
	</td></tr></table></ul>
	<ul><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@remotehost.edu:~/\{foo.txt,bar.txt\} .
	</td></tr></table></ul>

	
	</div>

<?php
	require_once('../../footer.php');
	?>