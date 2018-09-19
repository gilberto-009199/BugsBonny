/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package onion.server.tmp.util;

import java.io.IOException;
import java.net.ServerSocket;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author administrador
 */
public final class SocketConnect{
    private static ServerSocket server;
    private static int port;
    
    public static boolean executeServer(){
        try {
            server = new ServerSocket(port);
        } catch (IOException ex) {
            Logger.getLogger(SocketConnect.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        
        return false;
    }
}
