/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'basics',
                            type: 'image',
                            rect: ['398px', '17px', '1245px', '990px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"basics.svg",'0px','0px']
                        },
                        {
                            id: 'surf-board',
                            type: 'image',
                            rect: ['982px', '634px', '200px', '186px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"surf-board.svg",'0px','0px'],
                            transform: [[],[],[],['0','0']]
                        },
                        {
                            id: 'surf-suit',
                            type: 'image',
                            rect: ['1251px', '730px', '200px', '139px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"surf-suit.svg",'0px','0px'],
                            transform: [[],[],[],['0','0']]
                        },
                        {
                            id: 'gardender-kit-3',
                            type: 'image',
                            rect: ['1034px', '42px', '186px', '120px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"gardender-kit-3.svg",'0px','0px'],
                            transform: [[],[],[],['0','0']]
                        },
                        {
                            id: 'gardener-kit-2',
                            type: 'image',
                            rect: ['939px', '86px', '191px', '125px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"gardener-kit-2.svg",'0px','0px'],
                            transform: [[],[],[],['0','0']]
                        },
                        {
                            id: 'Group',
                            type: 'group',
                            rect: ['847', '121', '191', '144', 'auto', 'auto'],
                            c: [
                            {
                                id: 'gardener-kit-1',
                                type: 'image',
                                rect: ['0px', '0px', '191px', '144px', 'auto', 'auto'],
                                fill: ["rgba(0,0,0,0)",im+"gardeneder-kit-1.svg",'0px','0px'],
                                transform: [[],[],[],['1','0']]
                            }]
                        },
                        {
                            id: 't-hsirt',
                            type: 'group',
                            rect: ['500px', '405px', '246', '116', 'auto', 'auto'],
                            c: [
                            {
                                id: 'Pasted',
                                type: 'image',
                                rect: ['55px', '0px', '191px', '116px', 'auto', 'auto'],
                                fill: ["rgba(0,0,0,0)",im+"Pasted.svg",'0px','0px']
                            },
                            {
                                id: 'recommendation-box',
                                type: 'image',
                                rect: ['32px', '-12px', '91.4%', '139px', 'auto', 'auto'],
                                fill: ["rgba(0,0,0,0)",im+"recommendation-box.svg",'0px','0px']
                            },
                            {
                                id: 't-shirt3',
                                type: 'image',
                                rect: ['80px', '0px', '139px', '98px', 'auto', 'auto'],
                                fill: ["rgba(0,0,0,0)",im+"t-shirt3.svg",'0px','0px']
                            }]
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '1980px', '1020px', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,0.00)"]
                        }
                    }
                },
                timeline: {
                    duration: 4481.4485792683,
                    autoPlay: true,
                    labels: {
                        "loop": 0
                    },
                    data: [
                        [
                            "eid46",
                            "scaleY",
                            2222,
                            181,
                            "easeInOutBounce",
                            "${surf-board}",
                            '0',
                            '1'
                        ],
                        [
                            "eid93",
                            "scaleY",
                            3574,
                            129,
                            "easeInOutBounce",
                            "${surf-board}",
                            '1',
                            '0'
                        ],
                        [
                            "eid40",
                            "scaleX",
                            2068,
                            182,
                            "easeInOutBounce",
                            "${surf-suit}",
                            '0',
                            '1'
                        ],
                        [
                            "eid98",
                            "scaleX",
                            3704,
                            164,
                            "easeInOutBounce",
                            "${surf-suit}",
                            '1',
                            '0'
                        ],
                        [
                            "eid11",
                            "left",
                            1365,
                            213,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '127px',
                            '32px'
                        ],
                        [
                            "eid15",
                            "left",
                            1578,
                            34,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '32px',
                            '39px'
                        ],
                        [
                            "eid45",
                            "scaleX",
                            2222,
                            181,
                            "easeInOutBounce",
                            "${surf-board}",
                            '0',
                            '1'
                        ],
                        [
                            "eid92",
                            "scaleX",
                            3574,
                            129,
                            "easeInOutBounce",
                            "${surf-board}",
                            '1',
                            '0'
                        ],
                        [
                            "eid26",
                            "scaleX",
                            1578,
                            194,
                            "easeInOutBounce",
                            "${gardener-kit-1}",
                            '0',
                            '1'
                        ],
                        [
                            "eid116",
                            "scaleX",
                            4125,
                            149,
                            "easeInOutBounce",
                            "${gardener-kit-1}",
                            '1',
                            '0'
                        ],
                        [
                            "eid37",
                            "scaleX",
                            1903,
                            197,
                            "easeInOutBounce",
                            "${gardender-kit-3}",
                            '0',
                            '1'
                        ],
                        [
                            "eid104",
                            "scaleX",
                            3848,
                            161,
                            "easeInOutBounce",
                            "${gardender-kit-3}",
                            '1',
                            '0'
                        ],
                        [
                            "eid10",
                            "width",
                            1365,
                            213,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '22.36%',
                            '95.94%'
                        ],
                        [
                            "eid14",
                            "width",
                            1578,
                            34,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '95.94%',
                            '90.66%'
                        ],
                        [
                            "eid34",
                            "scaleY",
                            1750,
                            187,
                            "easeInOutBounce",
                            "${gardener-kit-2}",
                            '0',
                            '1'
                        ],
                        [
                            "eid111",
                            "scaleY",
                            3989,
                            154,
                            "easeInOutBounce",
                            "${gardener-kit-2}",
                            '1',
                            '0'
                        ],
                        [
                            "eid9",
                            "top",
                            1365,
                            213,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '41px',
                            '-12px'
                        ],
                        [
                            "eid16",
                            "top",
                            1578,
                            34,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '-12px',
                            '-14px'
                        ],
                        [
                            "eid87",
                            "scaleY",
                            4250,
                            119,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '1',
                            '0'
                        ],
                        [
                            "eid86",
                            "scaleX",
                            4250,
                            119,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '1',
                            '0'
                        ],
                        [
                            "eid22",
                            "background-color",
                            1612,
                            0,
                            "linear",
                            "${Stage}",
                            'rgba(255,255,255,0.00)',
                            'rgba(255,255,255,0.00)'
                        ],
                        [
                            "eid42",
                            "scaleY",
                            2068,
                            182,
                            "easeInOutBounce",
                            "${surf-suit}",
                            '0',
                            '1'
                        ],
                        [
                            "eid99",
                            "scaleY",
                            3704,
                            164,
                            "easeInOutBounce",
                            "${surf-suit}",
                            '1',
                            '0'
                        ],
                        [
                            "eid38",
                            "scaleY",
                            1903,
                            197,
                            "easeInOutBounce",
                            "${gardender-kit-3}",
                            '0',
                            '1'
                        ],
                        [
                            "eid105",
                            "scaleY",
                            3848,
                            161,
                            "easeInOutBounce",
                            "${gardender-kit-3}",
                            '1',
                            '0'
                        ],
                        [
                            "eid30",
                            "scaleY",
                            1578,
                            194,
                            "easeInOutBounce",
                            "${gardener-kit-1}",
                            '0',
                            '1'
                        ],
                        [
                            "eid117",
                            "scaleY",
                            4125,
                            149,
                            "easeInOutBounce",
                            "${gardener-kit-1}",
                            '1',
                            '0'
                        ],
                        [
                            "eid8",
                            "height",
                            1365,
                            213,
                            "easeInOutBounce",
                            "${recommendation-box}",
                            '33px',
                            '139px'
                        ],
                        [
                            "eid33",
                            "scaleX",
                            1750,
                            187,
                            "easeInOutBounce",
                            "${gardener-kit-2}",
                            '0',
                            '1'
                        ],
                        [
                            "eid110",
                            "scaleX",
                            3989,
                            154,
                            "easeInOutBounce",
                            "${gardener-kit-2}",
                            '1',
                            '0'
                        ],
                        [
                            "eid12",
                            "top",
                            1250,
                            174,
                            "easeInOutBounce",
                            "${t-shirt3}",
                            '0px',
                            '-42px'
                        ],
                        [
                            "eid19",
                            "top",
                            1424,
                            57,
                            "easeInOutBounce",
                            "${t-shirt3}",
                            '-42px',
                            '-18px'
                        ],
                        [
                            "eid24",
                            "top",
                            1652,
                            0,
                            "easeInOutBounce",
                            "${t-shirt3}",
                            '-18px',
                            '-18px'
                        ],
                        [
                            "eid57",
                            "top",
                            4345,
                            136,
                            "easeInOutBounce",
                            "${t-shirt3}",
                            '-18px',
                            '0px'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("yusp-recommendations-animation_edgeActions.js");
})("EDGE-64815824");
