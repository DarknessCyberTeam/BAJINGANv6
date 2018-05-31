import os, sys

print ("\033[1;32mMasukan UserName&Password:)")
print ("\033[1;31;1mKalo Gak Tau Pm Mr.BAJINGAN 083108271123")
username = 'BAJINGAN'      
password = 'Gans'

def restart():
	ngulang = sys.executable
	os.execl(ngulang, ngulang, *sys.argv)

def main():
	uname = raw_input("username : ")
	if uname == username:
		pwd = raw_input("password : ")

		if pwd == password:
			print "\n\033[1;34mHello Welcome To Tools B4J1N64N", 
			sys.exit()

		else:
			print "\n\033[1;36mSorry Invalid Password !!!\033[00m"
			print "Back Login\n"
			restart()

	else:
		print "\n\033[1;36mSorry Invalid Username !!!\033[00m"
		print "Back Login\n"
		restart()

try:
	main()
except KeyboardInterrupt:
	os.system('clear')
	restart()