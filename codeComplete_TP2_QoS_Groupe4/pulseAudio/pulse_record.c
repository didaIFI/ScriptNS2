#include <sys/socket.h>
#include <netinet/in.h>
#include <stdio.h>

#include <unistd.h>
#include <string.h>
#include <errno.h>

#include <pulse/simple.h>
#include <pulse/error.h>

#define BUFSIZE 1024
#define UDP_PORT 9999

int sockfd,n;
struct sockaddr_in servaddr,cliaddr;
socklen_t len;
char mesg[1000];



int record_and_send()
{
	/* The sample type to use */
	static const pa_sample_spec ss = {
		.format = PA_SAMPLE_S16LE,
		.rate = 44100,
		.channels = 2
	};

	pa_simple *s = NULL;
	int ret = 1;
	int error;

	/* Create the recording stream */
	if (!(s = pa_simple_new(NULL, "record_and_play", PA_STREAM_RECORD, 
					NULL, "record", &ss, NULL, NULL, &error))) {
		fprintf(stderr, __FILE__": pa_simple_new() failed: %s\n", pa_strerror(error));
		goto finish;
	}

	uint8_t buf[BUFSIZE];

	bzero(&buf,sizeof(buf));
	for (;;) {
		/* record data... */
		if (len=pa_simple_read(s, buf, sizeof(buf), &error) < 0) {
			fprintf(stderr, __FILE__": pa_simple_read() failed: %s\n", 
					pa_strerror(error));
			goto finish;
		}
		

	printf("len=%d  \n",len);
		// sent to server
	int nbSent = 0;
	nbSent = sendto(sockfd,buf,sizeof(buf),0,(struct sockaddr *)&servaddr,sizeof(servaddr));
	if (nbSent < 0){
		perror("sendto() failed\n");
		exit(-1);	
	}	
	printf("send to %d", nbSent);
	}

	ret = 0;

finish:
	if (s)
		pa_simple_free(s);

	return ret;
}

void init_socket(char *host)
{
	//creation de socket UDP
	sockfd=socket(AF_INET,SOCK_DGRAM,0);
	if (sockfd < 0){
		perror("socket() failed\n");	
		exit(-1);	
	}
	//preparation des parametres
	bzero(&servaddr,sizeof(servaddr));
	servaddr.sin_family = AF_INET;
	servaddr.sin_addr.s_addr=inet_addr(host);
	servaddr.sin_port=htons(UDP_PORT);
}

void read_file_and_send(char *filename)
{
	FILE *f = fopen(filename,"r");
	if(f==NULL){
		fprintf(stderr,"read file error");
		puts("read file error");
		return;                       
	}
	while(!feof(f))
	{
		uint8_t buf[BUFSIZE];
		ssize_t r;

		int byte_read = fread(buf,1,BUFSIZE,f);
		if(byte_read > 0)
		{
			n = sendto(sockfd,buf,byte_read,0,(struct sockaddr *)&servaddr,sizeof(servaddr));
			if (n < 0){
				perror("sendto() failed\n");	
				exit(-1);
			}
			printf("read byte = %d byte sent %d\n", byte_read,n);
		}
	}


}

int main(int argc, char**argv)
{
	char *filename;
	char *port;
	char *host;
	host=argv[1];
	filename=argv[3];
	init_socket(host);
	if(strcmp(argv[2],"-f")==0) {
		read_file_and_send(filename);
	} 
	if(strcmp(argv[2],"-r")==0) {
		record_and_send();
	}
}	

