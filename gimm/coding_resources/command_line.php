<!doctype html>
<html lang="en">
<?php
  $thisPage = "command_line";
  require_once('../../header.php');
  require_once('../../nav.php');
?>
<body>
	<H1>SCP Syntax Examples (<b>scp</b>)</H1>
	

	<H3>What is Secure Copy?</H3>
	<h4>scp allows files to be copied to, from, or between different hosts.  It uses ssh for data transfer and provides the same authentication and same level of security as ssh</h4>.
	<H3>SCP Examples</H3>

	<H4>This is what you will use most of the time for transfering single files to a certian location via scp with the -i command line option:<h4/>
	<H4/>To copy the file "foobar.html" from the local host to a remote host while in the directory containing foobar.html</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp -i  /Path/To/Your/Password.pem_file foobar.html your_username@remotehost.edu:/some/remote/directory/like/var/www/html/website/
	</td></tr></table></UL>
	<H4/>For example, for me the command to copy index.html up to my home aws directory is:</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	scp -i /Users/danielhampikian/Documents/aws_key.pem /Users/Daniel/Documents/git/daniel_website/index.html ec2-user@ec2-12-123-12-123.compute-1.amazonaws.com:/var/www/html/
	</td></tr></table></UL>
	<H4>Copy the file "foobar.txt" from a remote host to the local host</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@remotehost.edu:foobar.txt /some/local/directory
	</td></tr></table></UL>
	<H4>Copy the file "foobar.txt" from the local host to a remote host</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp foobar.txt your_username@remotehost.edu:/some/remote/directory
	</td></tr></table></UL>
	<H4>Copy the directory "foo" from the local host to a remote host's directory "bar"</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp -r foo your_username@remotehost.edu:/some/remote/directory/bar
	</td></tr></table></UL>
	<H4>Copy the file "foobar.txt" from remote host "rh1.edu" to remote host "rh2.edu"</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@rh1.edu:/some/remote/directory/foobar.txt \<br>your_username@rh2.edu:/some/remote/directory/
	</td></tr></table></UL>
	<H4>Copying the files "foo.txt" and "bar.txt" from the local host to your home directory on the remote host</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp foo.txt bar.txt your_username@remotehost.edu:~
	</td></tr></table></UL>
	<H4>Copy the file "foobar.txt" from the local host to a remote host using port 2264</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp -P 2264 foobar.txt your_username@remotehost.edu:/some/remote/directory
	</td></tr></table></UL>
	<H4>Copy multiple files from the remote host to your current directory on the local host</H4>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@remotehost.edu:/some/remote/directory/\{a,b,c\} .
	</td></tr></table></UL>
	<UL><table class="examples" border=0 cellspacing=0 cellpadding=10><tr><td>
	    $ scp your_username@remotehost.edu:~/\{foo.txt,bar.txt\} .
	</td></tr></table></UL>

	<h2>Some scp examples derived from: <a href="http://www.hypexr.org/linux_scp_help.php">hypexr.org</a></h2>

<?php
	require_once('../../footer.php');
	?>