#!/bin/bash

GRN='\033[32m'
NRM='\033[00m'

echo "press enter for start !";
read
curl -d login=user1 -d passwd=pass1 -d submit=OK 'localhost:8888/Day04/ex04/create.php'
read
curl -d login=user2 -d passwd=pass2 -d submit=OK 'localhost:8888/Day04/ex04/create.php'
read
echo -e "${GRN}\nVerification USER CREATION:\n${NRM}"
cat private/passwd
read
echo -e "${GRN}\nlogin USER1\n${NRM}"
curl -c user1.txt -d login=user1 -d passwd=pass1 -d submit=OK 'localhost:8888/Day04/ex04/login.php'
read
echo -e "${GRN}\nSend message USER1\n${NRM}"
curl -b user1.txt -d submit=OK -d msg=Bonjours 'localhost:8888/Day04/ex04/speak.php'
read
echo -e "${GRN}\nLogout USER1\n${NRM}"
curl -b user1.txt -c user1.txt 'localhost:8888/Day04/ex04/logout.php'
read
echo -e "${GRN}\nSend message USER1\n${NRM}"
curl -b user1.txt -d submit=OK -d msg=Bonjours 'localhost:8888/Day04/ex04/speak.php'
read
echo -e "${GRN}\nlogin USER2\n${NRM}"
curl -c user2.txt -d login=user2 -d passwd=pass2 -d submit=OK 'localhost:8888/Day04/ex04/login.php'
read
echo -e "${GRN}\nSend message USER2\n${NRM}"
curl -b user2.txt -d submit=OK -d msg=Hello 'localhost:8888/Day04/ex04/speak.php'
read
echo -e "${GRN}\nMORE PRIVATE/CHAT\n${NRM}"
more private/chat
read
echo -e "${GRN}\nDISPLAY ALL MESSAGE\n${NRM}"
curl -b user2.txt 'localhost:8888/Day04/ex04/chat.php'