#! ../usr/bin/python2

# import module
import subprocess,time,random,sys

# colour

G = "\033[32m"; O = "\033[33m"; B = "\033[34m"; R = "\033[31m"; W = "\033[0m";

# random.colour

x = "\033["
color = (x+"0m",x+"31m",x+"32m",x+"34m",x+"35m",x+"36m")
Z = random.choice(color)
r = random.choice(color)


def logo():

# platform

	if sys.platform == 'linux' or sys.platform == 'linux2':
		subprocess.call("clear", shell=True)
		time.sleep(1)

	else:
		subprocess.call("cls", shell=True)
		time.sleep(1)

# logo

	print r+"    _   _ _             ____"
	print r+"   | | | | |_ _ __ ___ |  _ \ "
	print r+"   | |_| | __| '_ ` _ \| | | |"
	print r+"   |  _  | |_| | | | | | |_| |"
	print r+"   |_| |_|\__|_| |_| |_|____/"

# Mengganti Author Tidak akan membuat anda menjadi PRO

	print R+"\n 0={==> "+W+"Html Downloader"+R+" <==}=0\n"
	print R+"[+]"+O+" author : "+Z+"Ci Ku "+O+"a.k.a"+Z+" XnVer404"
	print R+"[+]"+O+" thanks to "+Z+"OneSec Onz "+O+"and"+Z+" Null\n"
	use()



def use():
	website = raw_input(B+"[?]"+G+" website  : "+O)
	output = raw_input(B+"[?]"+G+" file output ("+B+"ex: hasil.htm"+G+") : "+O)
	time.sleep(1)

	print R+"[+] Curl started . . .\n"+G
	time.sleep(1)
	subprocess.call("curl "+website+" -o "+output,shell=True)
	time.sleep(1)

	print B+"\n[*]"+G+" File save : "+O+output
	exit()

print logo()
