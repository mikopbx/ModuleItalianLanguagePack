# ModuleItalianLanguagePack

Complete Italian language pack for MikoPBX including UI translations and TTS-generated voice prompts.

## What's Included

- **Voice Prompts**: 599 Italian voice prompts (22050 Hz, mono, 16-bit PCM WAV)
- **UI Translations**: Complete Italian translation of MikoPBX admin interface
- **Text Mapping**: `Sounds/core-sounds-it-it.txt` — full list of prompts with text

## Voice Generation

Voice prompts were generated using neural TTS (Text-to-Speech) technology:

- **Engine**: [Piper TTS](https://github.com/rhasspy/piper)
- **Voice model**: `it_IT-paola-medium` ([rhasspy/piper-voices](https://huggingface.co/rhasspy/piper-voices/tree/main/it/it_IT/paola/medium))
- **Sample rate**: 22050 Hz
- **Format**: WAV (PCM signed 16-bit, mono)

The text for each prompt is stored in `Sounds/core-sounds-it-it.txt` for reference and regeneration.

On module installation, MikoPBX automatically converts WAV files to all Asterisk formats (ulaw, alaw, gsm, g722, sln) for optimal codec compatibility.

## Installation

1. Download and install the module from MikoPBX Marketplace
2. Enable the module in **Modules** section
3. Go to **General Settings** and select Italian (Italiano) as the system language

## Requirements

- MikoPBX 2025.1.1 or later

## License

- Module code: GNU General Public License v3.0
- Sound files: CC BY-SA 4.0
- TTS engine: Piper TTS (https://github.com/rhasspy/piper)

## Copyright

- Module development: © 2017-2026 Alexey Portnov and Nikolay Beketov
- Voice synthesis: Generated using open-source TTS models
- Remaining system sounds (silence, tones): Generated as silent or descriptive WAV
