# 2 nodes : 1 AP + 1 station
# One source 
# MAC/PHY layer is 802.11g
# Created by S. Lohier on 26/03/2012
# ======================================================================
# Define options
# ======================================================================
set opt(chan)           Channel/WirelessChannel    ;# channel type
set opt(prop)           Propagation/FreeSpace      ;# radio-propagation model
#set opt(prop)           Propagation/TwoRayGround   ;# radio-propagation model
set opt(netif)          Phy/WirelessPhy            ;# network interface type
set opt(mac)            Mac/802_11                 ;# MAC type
set opt(ifq)            Queue/DropTail/PriQueue    ;# interface queue type
set opt(ll)             LL                         ;# link layer type
set opt(ant)            Antenna/OmniAntenna        ;# antenna model
set opt(ifqlen)         50                         ;# max packet in ifq
set opt(nn)             2                          ;# number of mobilenodes
set opt(adhocRouting)   AODV                       ;# routing protocol
#la surface X*Y
set opt(x)      400                            ;# x coordinate of topology
set opt(y)      400                            ;# y coordinate of topology
set opt(seed)   0.0                            ;# seed for random number gen.
set opt(stop)   2                             ;# time to stop simulation

# unity gain, omni-directional antennas
# set up the antennas to be centered in the node and 1.5 meters above it
Antenna/OmniAntenna set X_ 0
Antenna/OmniAntenna set Y_ 0
Antenna/OmniAntenna set Z_ 1.5
Antenna/OmniAntenna set Gt_ 1.0
Antenna/OmniAntenna set Gr_ 1.0

# Configuration for Standard 802.11g 54Mbps PC card
#puissance d'émission
Phy/WirelessPhy set Pt_ 1.00e-1	      ;# Transmitted Power 100mW
#la bande passante
Phy/WirelessPhy set bandwidth_ 54Mb
Mac/802_11 set dataRate_ 54Mb
Mac/802_11 set basicRate_ 6Mb              ;# for broadcast packets
Phy/WirelessPhy set freq_ 2.472e9          ;# channel-13. 2.472GHz
Phy/WirelessPhy set L_ 1.0                 ;# system loss factor
Phy/WirelessPhy set CPThresh_ 10.0         ;# capture threshold (db)
Phy/WirelessPhy set RXThresh_ 9.33e-10    ;# basic receive power threshold (W) 100m range with Pt=1e-1 and FreeSpace Model
Phy/WirelessPhy set CSThresh_ 2.33e-10     ;# carrier sense threshold (W) 200m range Free Space Model

# set up other MAC layer parameters
# Set RTS Threshold to a big value (3000) to avoid RTS/CTS Mechanism
Mac/802_11 set RTSThreshold_ 3000
Mac/802_11 set ShortRetryLimit_ 7  ;# default is 7
#Mac/802_11 set LongRetryLimit_ 4
Mac/802_11 set PreambleLength_ 80  ;# 12 symbol transmitted in 16s at 6Mbps, like 96 bits
Mac/802_11 set CWMin_         15
Mac/802_11 set CWMax_         1023
Mac/802_11 set SlotTime_      0.000009        ;# 9us
Mac/802_11 set SIFS_          0.000010        ;# 10us
Mac/802_11 set PLCPHeaderLength_      40      ;# 40 bits for 802.11g
Mac/802_11 set PLCPDataRate_  6.0e6           ;# 6Mbps for 802.11g
# Note that for 802.11g, PHY model is unchanged 
# and OFDM is not implemented instead of DSSS

# set up the Link Level parameters
LL set mindelay_		50us
LL set delay_			25us
LL set bandwidth_		0	;# not used

# ============================================================================
# check for boundary parameters and random seed
if { $opt(x) == 0 || $opt(y) == 0 } {
	puts "No X-Y boundary values given for wireless topology\n"
}
if {$opt(seed) > 0} {
	puts "Seeding Random number generator with $opt(seed)\n"
	ns-random $opt(seed)
}

proc create-god { nodes } {
	global ns_ god_ tracefd

	set god_ [new God]
	$god_ num_nodes $nodes
}

# create simulator instance
set ns_   [new Simulator]

set tracefd  [open wifi.tr w]
set namtrace [open wifi.nam w]
$ns_ trace-all $tracefd
$ns_ namtrace-all-wireless $namtrace $opt(x) $opt(y)

# Create topography object
set topo   [new Topography]

# define topology
$topo load_flatgrid $opt(x) $opt(y)

# create God
create-god $opt(nn)

# Create channel #1
set chan_1_ [new $opt(chan)]

# configure for nodes
$ns_ node-config -adhocRouting $opt(adhocRouting) \
                 -llType $opt(ll) \
                 -macType $opt(mac) \
                 -ifqType $opt(ifq) \
                 -ifqLen $opt(ifqlen) \
                 -antType $opt(ant) \
                 -propType $opt(prop) \
                 -phyType $opt(netif) \
		 -topoInstance $topo \
                 -wiredRouting OFF\
		 -agentTrace ON \
                 -routerTrace ON \
                 -macTrace ON \
		 -movementTrace OFF \
		 -channel $chan_1_

#  Create the nodes and "attach" them the channel.
# note the position and movement of mobilenodes is as defined
# in $opt(sc)

for {set i 0} {$i < $opt(nn) } {incr i} {
		set node_($i) [$ns_ node]	
		$node_($i) random-motion 0		;# disable random motion
		$node_($i) topography $topo
	}

# Provide initial (X,Y, for now Z=0) co-ordinates for mobilenodes
# Nodes position
$node_(0) set X_ 100
$node_(0) set Y_ 200
$node_(0) set Z_ 0.000000000000

$node_(1) set X_ 100
$node_(1) set Y_ 110
$node_(1) set Z_ 0.000000000000

# Setup CBR/UDP traffic flow from station to AP
#set udp_(0) [new Agent/UDP]
#$ns_ attach-agent $node_(1) $udp_(0)
#set null_(0) [new Agent/Null]
#$ns_ attach-agent $node_(0) $null_(0)
#set cbr_(0) [new Application/Traffic/CBR]
#la taille de paquet
#$cbr_(0) set packetSize_ 1000
#le délai
#$cbr_(0) set interval_ 0.0007
#$cbr_(0) set random_ 1
#$cbr_(0) set maxpkts_ 10000
#$cbr_(0) attach-agent $udp_(0)
#$ns_ connect $udp_(0) $null_(0)
#$ns_ at 1 "$cbr_(0) start"


# Setup CBR/TCP traffic flow from station to AP
#==========================
#creation agent TCP et l'attaché au noeud 1
set tcp_(0) [new Agent/TCP]
$ns_ attach-agent $node_(1) $tcp_(0)
#creation agent NULL et l'attaché au noeud 0
set null_(0) [new Agent/Null]
$ns_ attach-agent $node_(0) $null_(0)
#creation agent CBR
set cbr_(0) [new Application/Traffic/CBR]
#la taille de paquet
$cbr_(0) set packetSize_ 1000
#le délai
$cbr_(0) set interval_ 0.0007
$cbr_(0) set random_ 1
$cbr_(0) set maxpkts_ 10000
#attacher CBR avec agent TCP
$cbr_(0) attach-agent $tcp_(0)
#connecter les 
$ns_ connect $tcp_(0) $null_(0)
$ns_ at 1 "$cbr_(0) start"

# setup FTP/TCP traffic flow from station to AP
set tcp_(1) [new Agent/TCP]
$ns_ attach-agent $node_(1) $tcp_(1)
set sink_(1) [new Agent/TCPSink]
$ns_ attach-agent $node_(0) $sink_(1)
$ns_ connect $tcp_(1) $sink_(1)
set ftp_(1) [new Application/FTP]
$ftp_(1) attach-agent $tcp_(1)
$ns_ at 10 "$ftp_(1) start"

#enable node trace in nam
for {set i 0} {$i < $opt(nn)} {incr i} {
	$node_($i) namattach $namtrace
# 1 defines the node size in nam, must adjust it according to your scenario
	$ns_ initial_node_pos $node_($i) 1
}

# Tell all nodes when the simulation ends
for {set i } {$i < $opt(nn) } {incr i} {
    $ns_ at $opt(stop).0 "$node_($i) reset";
}

$ns_ at $opt(stop).0002 "puts \"NS EXITING...\" ; $ns_ halt"
$ns_ at $opt(stop).0001 "stop"
proc stop {} {
    global ns_ tracefd namtrace
    global ns_ tracefd
    $ns_ flush-trace
    close $tracefd
    close $namtrace
}

puts "Starting Simulation..."
$ns_ run

