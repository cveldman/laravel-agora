<?php

namespace Veldman\Agora;

class Agora
{
    public function __construct(
        public string $appId,
        public string $appCertificate
    ) { }

    public function generateToken($channelName) {
        $uid = 0;
        $role = RtcTokenBuilder::RoleAttendee;

        $expireTimeInSeconds = 7200;
        $currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($this->appId, $this->appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);

        return $token;
    }

    public function generateOptions($channelName) {
        return [
            'appId' => $this->appId,
            'channel' => $channelName,
            'token' => $this->generateToken($channelName)
        ];
    }
}