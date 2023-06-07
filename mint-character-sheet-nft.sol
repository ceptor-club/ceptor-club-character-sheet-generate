// SPDX-License-Identifier: MIT
pragma solidity ^0.8.9;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/Counters.sol";
import "@openzeppelin/contracts/utils/Strings.sol";
import "@openzeppelin/contracts/utils/Base64.sol";

//Character Sheet Minter Contract
contract CharacterSheetNFTs is ERC721, Ownable {
    using Counters for Counters.Counter;
    using Strings for uint256;

    Counters.Counter private _tokenIdCounter;

    constructor() ERC721("Ceptor Club Character Sheet NFTs -test06", "CCCSt06") {}

    function safeMint(address to) public {
        uint256 tokenId = _tokenIdCounter.current();
        _tokenIdCounter.increment();
        _safeMint(to, tokenId);
        tokenURI(tokenId);
    }

    //Values and Traits
    string public cName;
    string public cClass;
    string public cSpecies;
    string public cBackground;
    string public cAlignment;  
    string public cDescr;
    string public cPageLink;
    string public cIMGURL;
    
    //USE VRF To SEt THEse?
    /*string public cStr;
    string public cDex;
    string public cInt;
    string public cWis;
    string public cCon;
    string public cCha;
    */
    
  /*  
    struct Traits { 
		string cStr;
		string cDex;
		string cInt;
		string cWis;
		string cCon;
		string cCha;
	}
   */ 
    
//await contract.methods.setValuesAndMint(cName, cClass, cSpecies, cBackground, cAlignment, cDescr, cPageLink, cIMGURL).send({    
    
	function setValuesAndMint(string memory _cName, string memory _cClass, string memory _cSpecies, string memory _cBackground, string memory _cAlignment, string memory _cDescr, string memory _cPageLink, string memory _cIMGURL) public{
        cName = _cName;
        cClass = _cClass;
        cSpecies = _cSpecies;
        cBackground = _cBackground;
        cAlignment = _cAlignment;
        cDescr = _cDescr;
		cPageLink = _cPageLink;
        cIMGURL = _cIMGURL;
        /*
        cStr = _cStr;
        cDex = _cDex;
        cInt = _cInt;
        cWis = _cWis;
        cCon = _cCon;  
        cCha = _cCha;
        */
		
        safeMint(msg.sender);
    }
    function tokenURI(uint256 tokenId)
        public
        view
        override
        returns (string memory)
    {
        bytes memory dataURI = abi.encodePacked(
            '{',
                '"name": "Ceptor Club Character #', tokenId.toString(), '"'',',
                '"description": ''"', cDescr, '"',',',
                '"external_url": ''"', cPageLink, '"',',',
                '"image": ''"', cIMGURL, '"',',',
                '"attributes":',
                    '[',
                        '{',
                            '"trait_type": "Character Name"'',', 
                            '"value": ''"', cName, '"',
                        '}'',',
                        '{',
                            '"trait_type": "Character Class"'',', 
                            '"value": ''"', cClass, '"',
                        '}'',',
                        '{',
                            '"trait_type": "Species"'',', 
                            '"value": ''"', cSpecies, '"',
                        '}'',',
                         '{',
                            '"trait_type": "Background"'',', 
                            '"value": ''"', cBackground, '"',
                        '}'',',
                         '{',
                            '"trait_type": "Alignment"'',', 
                            '"value": ''"', cAlignment, '"',
                        '}',
                        //Remember this is a closing bracket.
                        /*
                        '{',
                            '"trait_type": "Strength"'',',
                            '"max_value": 30'',', 
                            '"value": ', cStr,
                        '}'',',
                        '{',
                            '"trait_type": "Dexterity"'',',
                            '"max_value": 30'',', 
                            '"value": ', cDex,
                        '}'',',
                        '{',
                            '"trait_type": "Intelligence"'',',
                            '"max_value": 30'',', 
                            '"value": ', cInt,
                        '}'',',
                        '{',
                            '"trait_type": "Wisdom"'',',
                            '"max_value": 30'',', 
                            '"value": ', cWis,
                        '}'',',
                        '{',
                            '"trait_type": "Constitution"'',',
                            '"max_value": 30'',', 
                            '"value": ', cCon,
                        '}'',',
                       	 '{',
                            '"trait_type": "Charisma"'',', 
                            '"max_value": 30'',', 
                            '"value": ', cCha,
                        '}',
                       	 */
                    ']',
            '}'
        );

        return string(
            abi.encodePacked(
                "data:application/json;base64,",
                Base64.encode(dataURI)
            )
        );
    }
}
