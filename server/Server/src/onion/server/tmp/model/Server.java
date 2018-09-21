/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package onion.server.tmp.model;

import java.io.IOException;
import java.io.InputStream;
import java.net.Socket;
import java.util.logging.Level;
import java.util.logging.Logger;
import onion.server.tmp.util.SocketConnect;
import sun.awt.windows.ThemeReader;

/**
 *
 * @author administrador
 */
public class Server  implements Runnable {
    private Socket server;
    
    
    public Server() throws IOException{
        this.server = SocketConnect.server.accept();
        //Iniciando o servidor 
        Thread thServer = new Thread(this);
        
    }
    
    @Override
    public void run() {
        try {
            
            Socket socketetmp = SocketConnect.server.accept();
            InputStream serverPut = socketetmp.getInputStream();
            
        } catch (IOException ex) {
            Logger.getLogger(Server.class.getName()).log(Level.SEVERE, null, ex);
        }
       
 
        
        
    }
    
}
